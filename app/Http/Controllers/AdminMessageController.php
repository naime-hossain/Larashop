<?php

namespace App\Http\Controllers;

use Alert;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    /**
     * Display a listing of the message.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages=Message::with('user')->paginate(15);
        return view('admin.message.index',compact('messages'));
    }

    /**
     * Display the specified message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=Message::with('user')->findOrFail($id);
        return view('admin.message.read',compact('message'));
    }

   
    /**
     * Remove the specified message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $message=Message::findOrFail($id);

           $message->delete();
       Alert::warning('message deleted');
       return redirect(Route('message.index'));
    }
     /**
     * Remove the specified messages from storage via index page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete( Request $request)
    {
       $input=$request->except('_method','_token');
       foreach ($input as $item) {
           $message=Message::findOrFail($item);

           $message->delete();
       }
       Alert::warning('message deleted');
       return redirect(Route('message.index'));
    }
}
