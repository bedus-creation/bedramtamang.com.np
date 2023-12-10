<?php

namespace App\Application\Admin\Controllers;

use Aammui\LaravelTaggable\Models\Category;
use Aammui\LaravelTaggable\Models\Tag;
use App\Application\Admin\Requests\ArticleStoreRequest;
use App\Domain\CMS\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    protected $repository;

    public function __construct(Post $article)
    {
        $this->repository = $article;
    }

    public function index()
    {
        $articles = $this->repository->all();
        return view('admin.articles.index', compact('articles'));
    }

    public function create(Request $request): Response
    {
        $categories = Category::all();
        $tags       = Tag::all();

        return Inertia::render('Admin/Articles/Create', [
            'categories' => $categories,
            'tags'       => $tags
        ]);
    }

    public function store(ArticleStoreRequest $articleStoreRequest): RedirectResponse
    {
        $article = $this->repository->create($articleStoreRequest->all());
        $article->addCategory($articleStoreRequest->categories);
        $article->addTag($articleStoreRequest->tags);
        if ($articleStoreRequest->image) {
            $article->toCollection('cover')
                ->toDisk('public')
                ->addMedia(request()->image);
        }
        return redirect()->back()->with('success', 'Article has been created.');
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function edit(Request $request, $id): Response
    {
        $categories = Category::all();
        $tags       = Tag::all();
        $article    = $this->repository->with(['media', 'tag', 'category'])->findOrFail($id);

        return Inertia::render('Admin/Articles/Edit', [
            'categories' => $categories,
            'tags'       => $tags,
            'article'    => $article
        ]);
    }

    public function update(Request $request, $id)
    {
        $article = $this->repository->findOrFail($id);
        $article->update($request->all());
        $article->addCategory($request->categories);
        $article->addTag($request->tags);
        if ($request->image) {
            optional($article->fromCollection('cover')->getMedia()->first())->delete();
            $article->toCollection('cover')
                ->toDisk('public')
                ->addMedia(request()->image);
        }
        return redirect()->back()->with('success', 'Article has been Updated.');
    }

    /**
     * Delete article resource
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        $article = $this->repository->findOrFail($id);
        $article->delete();
        return redirect()->back()->with('success', 'Article has been deleted.');
    }
}
