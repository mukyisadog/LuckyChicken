<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    private function callOpenAPI($prompt)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.openai.com/v1/completions',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => '{
          "model": "text-davinci-003",
          "prompt": "' . $prompt . '",
          "max_tokens": 3000,
          "temperature": 0
          }
          ',
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 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',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $jsonObj = json_decode($response,true);
        return $jsonObj["choices"][0]["text"];
    }

    public function handle(Request $request)
    {
        // 獲取使用者輸入的訊息
        $message = $request->input('message');

        // 將訊息送到 OpenAI API 中進行回應
        $response = $this->callOpenAPI($message);

        // 回傳回應訊息
        // return response()->json(['message' => $response]);
        return $response;
    }
}
