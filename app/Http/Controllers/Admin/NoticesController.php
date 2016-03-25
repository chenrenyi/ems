<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Notices;
use Redirect, Input, Weixin;

class NoticesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        return view('admin.notices.index')->withNotices(Notices::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return view('admin.notices.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function anyStore()
	{
		$notice = new Notices;
		$notice->content = Input::get('content');
		$notice->class = Input::get('class');

		$type = Input::get('type');

		if($type == 'text') {
			$notice->type = 0;
			$msg = Weixin::makeMsg('text', $notice->content);
		}

		if($type == 'image') {

		}

		if($type == 'article') {
			$notice->type = 1;
			$notice->title = Input::get('title');
			$notice->cover = Input::get('cover');
			$notice->summary = Input::get('summary');
		}

        if ($notice->save()) {
        	Weixin::send($msg, $notice->class);
         	echo 0;	
        } else {
        	echo 1;
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return view('admin.notices.edit')->withNotice(Notices::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $this->validate($request, [
             'content' => 'required',
        ]);
        if (Notices::where('id', $id)->update(Input::except(['_method', '_token']))) {
            return Redirect::to('admin/notices');
        } else {
             return Redirect::back()->withInput()->withErrors('更新失败！');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $notice = Notices::find($id);
        $notice->delete();

        return Redirect::to('admin/notices');
	}

}
