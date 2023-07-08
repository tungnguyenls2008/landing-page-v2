<?php

namespace App\Http\Controllers;


use App\Models\ChatContent;
use Orhanerday\OpenAi\OpenAi;
use Symfony\Component\HttpFoundation\Request;

class ChatController extends Controller
{
    public function callChatGPT(Request $request)
    {
        $message=$request->get('message');
        $chatContent= new ChatContent();
        $chatContent->question=$message;
        $chatContent->save();
        $open_ai = new OpenAi(env('CHAT_GPT_KEY'));
        $chat = $open_ai->chat([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    "role" => "user",
                    "content" => $message
                ],
            ],
            'temperature' => 1.0,
            'max_tokens' => 4000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);
        // decode response
        $d = json_decode($chat);
        // Get Content
        if (isset($d->choices)){
            $answer=$d->choices[0]->message->content;
            $chatContent->answer=$answer;
            $chatContent->save();
            $specialKeywords=['created by OpenAI','trợ lý ảo','tạo ra bởi OpenAI',' I assist you'];
            foreach ($specialKeywords as $keyword){
                if (str_contains($answer,$keyword)){
                    if (session('locale')=='en'){
                        $answer='<ul><li>Quick contact me by phone: <b>0914 831 089</b><br> by mail: <b>tungnguyenls2008@gmail.com</b></li>
                <br> <li>You can find all of my information in this site.</li>
                <br> <li>I\'m a web dev for hide so name your price!</li></ul>
                <hr> This chat is supported by OpenAI so feel free to ask me anything.
                ';
                    }else{
                        $answer='<ul><li>Liên lạc với tôi qua: <br>SĐT: <b>0914 831 089</b><br>mail: <b>tungnguyenls2008@gmail.com</b></li>
                <br> <li>Bạn có thể tìm thấy mọi thông tin về tôi trên trang này.</li>
                <br> <li>Tôi là một thủy quân lục Code nên là tiền nào của nấy hen ;)</li></ul>
                <hr> Chức năng trò chuyện này được hỗ trợ bởi OpenAI nên bạn cứ thoải mái hỏi tôi những gì bạn muốn!
                ';
                    }
                    return $answer;
                }
            }
        }else{
            if (session('locale')=='en'){
                $answer='I\'m sorry but there\'re too many people asking me at the moment, please come back later,
                or contact me directly by email <b>tungnguyenls2008@gmail.com</b>, or phone <b>(+84) 0914 831 089</b>
                thank you ;)
                ';
            }else{
                $answer='Mong bạn thứ lỗi, đang có hơi nhiều câu hỏi được đặt ra cho tôi ngay lúc này,
                cảm phiền bạn quay lại sau hoặc liên hệ trực tiếp với tôi qua email <b>tungnguyenls2008@gmail.com</b>,
                hoặc số điện thoại <b>(+84) 0914 831 089</b>
                xin cảm ơn ;)
                ';
            }
            return $answer;
        }


    }
}
