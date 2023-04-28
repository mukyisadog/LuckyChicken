<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\GPT3\Chat;


class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        // 在這裡編寫聊天機器人回應的邏輯
        $input = $request->all();
        $message = $input['message'];
        
        // 將訊息送到 ChatGPT 中進行回應
        $chatgpt = new OpenAI\ChatGPT(config('services.openai.api_key'));
        $response = $chatgpt->complete($message);
        $text = $response['choices'][0]['text'];

        // 新的
        $chat = new Chat(config('services.openai.api_key'), config('services.openai.model'), [
            'temperature' => config('services.openai.temperature'),
            'max_tokens' => config('services.openai.max_tokens'),
            'timeout' => config('services.openai.timeout'),
        ]);

        $response = $chat->chat('Hello, how are you?');
        $reply = $response['choices'][0]['text'];


        // 回傳回應訊息
        return response()->json(['message' => $text]);


        

    }
}
