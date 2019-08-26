<?php

namespace SwiftDesign\Api\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

//Import API Traits 
use SwiftDesign\Api\Traits\ApiTrait;

class BlogController extends Controller
{
    use ApiTrait;

    public function getBlogMain()
    {
        $view_location = 'pages.blog.main';

        $blogs = $this->getAllBlogsAPI();

        if(is_null($blogs))
        {
            abort(404);
        }

        $paginator = $this->CustomPaginate($blogs,4);
        
        return view($view_location, [
            's3route'  => $this->getS3route(),
            'blogs'    => $paginator,
            'categories' => $this->getCategories(),
        ]);
    }

    public function getBlogSingle($site_key, $blog_id)
    {
        $view_location = 'pages.blog.single';
        
        $blog = $this->getSingleBlogAPI($blog_id);

        if(is_null($blog))
        {
            abort(404);
        }
        return view($view_location, [
            's3route'  => $this->getS3route(),
            'news'    => $blog,
            'categories' => $this->getCategories(),
        ]);
    }

    public function getBlogsCategory($category)
    {
        $view_location = 'pages.blog.main';

        $blogs = collect($this->getAllBlogsAPI())->where('category_name',$category)->all();
        
        if(is_null($blogs))
        {
            abort(404);
        }
        
        $route = '/blog/category/'.$category;
        $paginator = $this->CustomPaginate($blogs,4, $route);
        
        return view($view_location, [
            's3route'  => $this->getS3route(),
            'blogs'    => $paginator,
            'categories' => $this->getCategories(),
        ]);
    }

    public function getCategories()
    {
        $blogs = $this->getAllBlogsAPI();
        return array_unique(array_pluck($blogs,'category_name'));
    }

    public function getAllBlogsAPI()
    {
        return $this->CallSwiftAPI('request/client/blog/all');
    }

    public function getSingleBlogAPI($id)
    {
        return $this->CallSwiftAPI('request/client/blog/single', $id);
    }
    
}
