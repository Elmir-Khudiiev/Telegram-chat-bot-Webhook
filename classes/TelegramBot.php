<?php

namespace classes;

class TelegramBot
{
    protected $token;

    public function __construct()
    {
        $this->token = json_decode(json_encode(require('./config.php')))->token;
    }

    public function getChatData()
    {
        $data = file_get_contents('php://input');
        $object = json_decode($data);

        return $object;
    }

    protected function request(string $method, array $parameters = [])
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $this->token .  '/' . $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);

        $request = json_decode(curl_exec($curl));

        curl_close($curl);

        return $request;
    }

    public function sendMessage($chat_id, string $text)
    {
        $response = $this->request('sendMessage', [
            'text' => $text,
            'chat_id' => $chat_id
        ]);

        return $response;
    }
}