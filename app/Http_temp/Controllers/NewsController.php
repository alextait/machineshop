<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
	
	public function getNews(){
		$newsArticles = News::orderBy('created_at', 'desc')->get();
	   	return view('news.news')->with('newsArticles', $newsArticles);
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$news = News::all();
		return view('news.index')->with('news', $news);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$news = News::all();

		return view('news.create')->with('news', $news);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		$NewsItem = new News();
		$NewsItem->heading = $request->heading;
		$NewsItem->body = $request->body;
		$NewsItem->save();

		return $this->index();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
		$newsArticle = News::find($id);
		return view('news.show')->with('newsArticle', $newsArticle);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
		$newsArticle = News::find($id);
		return view('news.edit')->with('newsArticle', $newsArticle);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
		$NewsItem = News::find($id);
		$NewsItem->heading = $request->heading;
		$NewsItem->body = $request->body;
		$NewsItem->save();

		return $this->edit($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
		$newsArticle = News::find($id);

	   //
		$newsArticle->delete();

		//Redirect to the edit page just in case they wish to edit the item they just added
		return redirect()->route('news.index');
	}
}
