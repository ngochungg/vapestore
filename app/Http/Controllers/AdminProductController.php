<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function authenLogin()
    {
        if (auth()->check()){
            return Redirect::to('home');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function __construct(Category $category, Product $product,ProductImage $productImage,Tag $tag,ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function index(){
        $this->authenLogin();
        $products = $this->product->paginate(5);
        return view('admin.product.index', compact('products'));
    }
    public function create(){
        $this->authenLogin();
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    public function store(ProductAddRequest $request){
        try {
            DB::beginTransaction();
            $dataProductCreate =[
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'content' => $request->contents,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];

            $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            // Insert data to product_images
            if ( $request->hasFile('image_path') ) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            // Insert tags for product
            if (!empty($request->tags)) {
            foreach ($request->tags as $tagItem){
                // Insert to tags
                $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagIds[] = $tagInstance->id;
            }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line: '.$exception->getLine());
        }
    }
    public function edit($id){
        $this->authenLogin();
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit',compact('htmlOption','product'));
    }
    public function update(EditProductRequest $request,$id){
        try {
            DB::beginTransaction();
            $dataProductUpdate =[
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'content' => $request->contents,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
            ];

            $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);//true/false
            $product = $this->product->find($id);
            // Insert data to product_images
            if ( $request->hasFile('image_path') ) {
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            // Insert tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line: '.$exception->getLine());
        }
    }
    public function delete($id) {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function details($id){
        $this->authenLogin();
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.details',compact('htmlOption','product'));
    }

}
