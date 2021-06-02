<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImages;
use App\Models\Titles;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    use StorageImageTrait;
    private $news;
    private $newImages;
    private $titles;

    public function __construct(News $news, NewsImages $newsImages,Titles $titles)
    {
        $this->news = $news;
        $this->newImages = $newsImages;
        $this->titles = $titles;
    }

    public function index()
    {
//        $news = News::all();
        $news = $this->news->paginate(5);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.add');
    }

    public function store(Request $request)
    {
//        dd($request->file_name);
        try {
            DB::beginTransaction();
            $dataNewsCreate =[
                'titles' => $request->titles,
                'content' => $request->contents,
            ];

            $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','news');
            if (!empty($dataUploadFeatureImage)) {
                $dataNewsCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataNewsCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $news = $this->news->create($dataNewsCreate);
            // Insert data to product_images
            if ( $request->hasFile('image_path') ) {
                foreach ($request->image_path as $fileItem) {
                    $dataNewsImageDetail = $this->storageTraitUploadMutiple($fileItem, 'news');
                    $news->images()->create([
                        'image_path' => $dataNewsImageDetail['file_path'],
                        'image_name' => $dataNewsImageDetail['file_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('news.index');


        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line: '.$exception->getLine());
        }
    }

    public function show(News $news)
    {
        //
    }

    public function edit($id)
    {
        $news = $this->product->find($id);
        return view('admin.product.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
