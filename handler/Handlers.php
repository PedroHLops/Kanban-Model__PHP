<?PHP
    class Handlers{
        public static function sucess($data, $message, $code) {
            return [
                'status' => 'success',
                'data'=> $data,
                'message'=> $message,
                'code'=> $code
            ];
        }

        public static function error($data, $message, $code) {
            return [
                'status'=> 'error',
                'data'=> $data,
                'message'=> $message,
                'code'=> $code
            ];
        }
    }
?>