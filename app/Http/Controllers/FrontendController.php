<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Month;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Review;
use App\Models\Brand;
use App\Models\Size;
use App\Models\ProductFavourite;
use DB;


class FrontendController extends Controller
{
    public function index(){
        $data ['title'] = 'Index';
        $data ['banners'] = Banner::orderby('created_at','DESC')->take(2)->get();
        $data ['sliders'] = Slider::orderby('created_at','ASC')->take(3)->get();
        $data ['products'] = Product::take(8)->get();
        $data ['bestSellers'] = Product::orderBy('id', 'DESC')->take(8)->get();
        $data ['featured'] = Product::orderBy(DB::raw('RAND()'))->take(8)->get();
        $data ['specialOffers'] = Product::orderBy(DB::raw('RAND()'))->take(8)->get();
        $data ['clients'] = Review::orderBy(DB::raw('RAND()'))->take(4)->get();
        return view('web.pages.index',$data);
    }

    public function detail($slug){
        $data ['title'] = 'Product Detail';
        $data ['product'] = Product::where('slug',$slug)->firstorfail();
        $data ['galleries'] = Gallery::where('product_id',$data['product']->id) -> get();
        $data ['relatedProducts'] = Product::where('category_id',$data['product']['category_id'])->inRandomOrder()->limit(4)->get();
        $data ['reviews'] = Review::where('product_id',$data['product']->id)->take(3)->get();
        $data ['review'] = Review::where('product_id',$data['product']->id)->count();
        $data ['reviewCount'] = Review::where('reviews','id')->first();
        $data['shareButton']=\Share::page(
            route('product.detail' , $data['product']->slug),
            'here is the text',
            )
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->reddit()
            ->telegram()
            ->pinterest();
        return view('web.pages.product-detail',$data);
    }

    public function page($slug){
        $data ['page'] = Page::where('slug',$slug)->firstorfail();
        return view('web.pages.page',$data);
    }

    public function about(){
        $data ['title'] = 'About us';
        $data ['reviews'] = Review::get();
        return view('web.pages.about',$data);
    }

    public function faq(){
        $data ['title'] = 'Faq';
        return view('web.pages.faq',$data);
    }

    public function terms(){
        $data ['title'] = 'Terms And Conditions';
        return view('web.pages.terms',$data);
    }

    public function blog(Request $request){
        $data = new Blog ();

        if(isset($request->title)){
            $data = $data->where('title','LIKE','%'.$request->title.'%');
        }

        $title  = 'Blogs';
        $blogs = Blog::orderBy('id','desc')->paginate(5);
        $recentPosts  = Blog::orderBy('id','asc')->take(3)->get();
        $months = Month::orderBy('name','ASC')->get();
        $categories = Category::get();
        $data = $data->where('status', 1)->paginate(5);
        return view('web.pages.blog',compact('data','title','blogs','recentPosts','months','categories'));
    }

    public function blogDetail($slug){
        $data ['title'] = 'Blog Detail';
        $data ['blog'] = Blog::where('slug',$slug)->firstorfail();
        $data ['categories'] =  Category::get();
        $data ['relatedBlogs'] = Blog::where('category_id',$data['blog']['category_id'])->inRandomOrder()->limit(4)->get();
        $data ['popularPosts'] = Blog::orderBy('views','DESC')->take(5)->get();
        //views
        $oldViews = $data['blog']->views;
        $newViews = $oldViews + 1;

        //Updating Views to Blog table
        $data ['views']  = Blog::where('slug',$slug)->update(['views' => $newViews]);
        $data ['comments'] = Comment::where('blog_id', $data['blog']['id'])->get();
        $data['shareButton']=\Share::page(
            route('blog-detail' , $data['blog']->slug),
            'here is the text',
            )
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->reddit()
            ->telegram()
            ->pinterest();
        return view('web.pages.blog-detail',$data);
    }

    public function blogMonth($name){
        $data ['month'] =  Month::where('name',$name)->firstorfail();
        $data['blogs']= Blog::where('month_id',Month::where('name',$name)->value('id'))->paginate(6);
        return view('web.pages.monthblog',$data);

    }

    public function categoryWise($slug){
        $data ['category'] = Category::where('slug',$slug)->firstorfail();
        $data['blogs']= Blog::where('category_id',Category::where('slug',$slug)->value('id'))->paginate(6);
        return view('web.pages.categoryWise',$data);

    }

    public function shop(Request $request){
        $data = new Product ();

        if(isset($request->title)){
            $data = $data->where('title','LIKE','%'.$request->title.'%');
        }

        if (isset($request->min) && isset($request->max)) {
            $data = $data->whereBetween('price', [intVal($request->min), intVal($request->max)]);
        }

        $title = 'Shop';
        $data = $data->orderBy('id','ASC')->paginate(6);
        $categories = Category::get();
        $brands = Brand::get();
        $sizes = Size::get();
        $shareButton=\Share::page(
            route('pages.shop'),
            'here is the text',
            )
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->reddit()
            ->telegram()
            ->pinterest();
        return view('web.pages.shop',compact('title','data','shareButton','categories','brands','sizes'));
    }


    public function categoryProduct($slug){
        $data ['category'] = Category::where('slug',$slug)->firstorfail();
        $data['products']= Product::where('category_id',Category::where('slug',$slug)->value('id'))->paginate(5);
        $data ['shareButton']=\Share::page(
            route('categorywise.product',$data['category']->slug),
            'here is the text',
            )
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->reddit()
            ->telegram()
            ->pinterest();
        return view('web.pages.categoryProduct',$data);

}

    public function brandProduct($slug){
        $data ['brand'] = Brand::where('slug',$slug)->firstorfail();
        $data['products']= Product::where('brand_id',Brand::where('slug',$slug)->value('id'))->paginate(5);
        $data ['shareButton']=\Share::page(
            route('brandwise.product',$data['brand']->slug),
            'here is the text',
            )
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->linkedin()
            ->reddit()
            ->telegram()
            ->pinterest();
        return view('web.pages.brandProduct',$data);
    }

        public function sizeProduct($size){
            $data ['size'] = Size::where('size',$size)->firstorfail();
            $data['products']= Product::where('size_id',Size::where('size',$size)->value('id'))->paginate(5);
            $data ['shareButton']=\Share::page(
                route('sizewise.product',$data['size']->size),
                'here is the text',
                )
                ->whatsapp()
                ->facebook()
                ->twitter()
                ->linkedin()
                ->reddit()
                ->telegram()
                ->pinterest();
            return view('web.pages.sizeProduct',$data);
}

    public function wishlist(){
        $data ['title'] = 'Wishlist';
        $data ['favourites'] = ProductFavourite::where('user_id',auth()->user()->id)->get();
        return view('web.pages.wishlist',$data);
    }

    public function destroy($id){
        $productfavourite = ProductFavourite::find($id);
        $productfavourite->delete();
        if($productfavourite){
            return redirect()->back()->with('success' , 'Product deleted from Wishlist');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}
