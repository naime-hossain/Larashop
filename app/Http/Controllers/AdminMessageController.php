<?php

namespace App\Http\Controllers;

use Alert;
use App\Mail\SendUserReply;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
     * show message compose form .
     *
     * 
     * 
     */
    public function replyform($id='')
    {
        if ($id) {
            $message=Message::findOrFail($id);
            return view('admin.message.compose',compact('message'));
        }else{
            return view('admin.message.compose');
        }
        
    }

   /**
     * send message to user .
     *
     * 
     * 
     */
    public function sendmessage(Request $request)
    {
        $message=$request->all();
        Mail::to($message['to'])->send(new SendUserReply($message));
       Alert::success('message send to user');
       return redirect(Route('message.index'));
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
