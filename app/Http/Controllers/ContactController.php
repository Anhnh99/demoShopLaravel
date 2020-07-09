<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Swift_Attachment;
class ContactController extends Controller
{
    public function sendMail(RequestContact $request){
    if($request->isMethod('post')){
        $data=[
            'name'=>$request->txt_name,
            'email'=>$request->txt_email,
            'content'=>$request->txt_content
        ]; 
        Mail::send('front_end.mailContent',$data,function ($message){
            $message->to('nguyenhoanganh29101999@gmail.com','Nguyễn Hoàng Anh')
            ->from('gmailKhach@gmail.com','Nguyễn Hoàng Anh')
            ->setBody('Nội dung gửi','text/html')
            ->setSubject('Tiêu đề mail');
        });
        return redirect()->route('front-contact') ->with(['msg'=>'Gửi email thành công']);
    }
    return view('front_end.contact');
    }
}
