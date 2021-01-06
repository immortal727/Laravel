<?php


namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Country;
use App\Models\City;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //        $data = Country::all();
        //        $data = Country::query()->limit(5)->get();
        //        $data = Country::where('Code', '<', 'ALB')->select('Code', 'Name')->offset(1)->limit(2)->get();
        //        $data = City::find(5);
        //        $data = Country::find('AGO2');
        //        dd($data);

        /*$post = new Post();
        $post->title = 'Post 4';
        $post->content = 'Lorem ipsum 4';
        $post->save();*/

       // Post::create(['title' => 'Post 7', 'content' => 'Lorem ipsum 7']);
        /*$post = new Post();
        $post->fill(['title' => 'Post 8', 'content' => 'Lorem ipsum 8']);
        $post->save();*/

        /*$post = Post::find(6);
        $post->content = 'Lorem ipsum 6';
        $post->save();*/

        //        Post::where('id', '>', 3)
        //            ->update(['updated_at' => NOW()]);

        //        $post = Post::find(7);
        //        $post->delete();

        // Post::destroy(4, 5);

        // Получение рубрики для поста
       /* $post = Post::find(3);
        dump($post->title, $post->rubric->title);*/

        // Получение поста для рубрики
        /*$rubric = Rubric::find(3);
        dump($rubric->title, $rubric->post->title);*/

        // Получение рубрики
       /* $rubric = Rubric::find(1);
        dump($rubric->posts);*/

        /*$post = Post::find(2);
        dump($post->title, $post->rubric->title);*/

        /*$posts = Post::with('rubric')->where('id', '>', 1)->get();
        foreach ($posts as $post){
            dump($post->title, $post->rubric->title);
        }*/

        // Связь многие ко многим Many To Many
       /* $post = Post::find('2');
        dump($post->title);
        foreach ($post->tags as $tag) {
            dump($tag->title);
        }*/

       /* $tag = Tag::find('2');
        dump($tag->title);
        foreach ($tag->posts as $post) {
            dump($post->title);
        }*/

        // Добавление элемента в сессию
       /* $request->session()->put('test', 'Test value');*/
        /*session(['cart' => [
            ['id' => 1, 'title' => 'Product'],
            ['id' => 2, 'title' => 'Product2'],
        ]]);*/

        /*dump(session('test'));
        dump(session('cart')['1']['title']);*/
      //  dump($request->session()->get('cart')[0]['title']);
      //  dump($request->session()->all());

        // Добавление в сессию
        /*$request->session()->push('cart', ['id' => 3, 'title' => 'Product 3']);*/

       // Удаление из сессионного массива
     //   dump($request->session()->pull('test'));

        // Удалить из сессии полностью по ключу
       // $request->session()->forget('test');

        // Очистить полностью содержимое сессии
       // $request->session()->flush();

       // dump(session()->all());
        // Cookie::queue('test', 'Test cookie', 5);
        // Cookie::queue(Cookie::forget('test'));
       // dump(Cookie::get('test'));
        //dump($request->cookie('test'));

        // Кэш
       // Cache::put('key', 'Value', 300);
       // dump(Cache::get('key'));

        /*dump(Cache::pull('key'));
        dump(Cache::get('key'));*/

     /*   Cache::forget('key');
        dump(Cache::get('key'));*/

        // Удаление кэша
       // Cache::flush();

        if(Cache::has('posts')){
            $posts = Cache::get('posts');
        } else{
            $posts = Post::orderBy('id', 'desc')->get();
            Cache::put('posts', $posts);
        }


        $title = 'Home Page!';

        return view('home', compact('title', 'posts'));

    }

    public function create(){
        $title = 'Create Posts';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer',
        ]);
       /* $rules = [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer',];
        $messages = [
            'title.required' => 'Заполните поле название',
            'title.min' => 'Минимум 5 символов в названии',
            'rubric_id.integer' => 'Выберите рубрику из списка',
        ];
        $validator = Validator::make($request->all(), $rules, $messages)->validate();*/
        Post::create($request->all());
        $request->session()->flash('success', 'Данные сохранены!');
        return redirect()->route('home');
    }
}
