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

        $answer=$d->choices[0]->message->content;
        $chatContent->answer=$answer;
        $chatContent->save();
        $specialKeywords=['created by OpenAI','trợ lý ảo','tạo ra bởi OpenAI'];
        foreach ($specialKeywords as $keyword){
            if (str_contains($answer,$keyword)){
                if (session('locale')=='en'){
                    $answer='Quick contact me by phone: 0914 831 089, by mail: tungnguyenls2008@gmail.com
                <br> You can find all of my information in this site.
                <br> I\'m a web dev for hide so name your price!
                <hr> This chat is supported by OpenAI so feel free to ask me anything.
                ';
                }else{
                    $answer='Liên lạc với tôi qua SĐT: 0914 831 089, qua mail: tungnguyenls2008@gmail.com
                <br> Bạn có thể tìm thấy mọi thông tin về tôi trên trang này.
                <br> Tôi là một thủy quân lục Code nên là tiền nào của nấy hen ;)
                <hr> Chức năng trò chuyện này được hỗ trợ bởi OpenAI nên bạn cứ thoải mái hỏi tôi những gì bạn muốn!
                ';
                }
                return $answer;
            }
        }

        return $answer;
    }
}
