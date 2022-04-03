<?php

namespace App\Http;

use App\Core\Support\AbstractController;
use App\Services\CryptService;
use Illuminate\Http\Request;

class CryptController extends AbstractController
{
    private $cryptService;

    public function __construct(CryptService $cryptService)
    {
        $this->cryptService = $cryptService;
    }

    public function crypt(Request $request)
    {
        $params = $this->toValidate($request, [
            'key' => 'required|numeric',
            'text' => 'required',
            'remove_spaces' => 'nullable|boolean',
            'remove_punctation' => 'nullable|boolean',
        ]);

        $this->cryptService->setKey($params['key']);

        return response()->json([
            'message' => $this->cryptService->encryptText($params['text'], $params['remove_spaces'] ?? false, $params['remove_punctation'] ?? false)
        ], 200);
    }

    public function decrypt(Request $request)
    {
        $params = $this->toValidate($request, [
            'key' => 'required|numeric',
            'text' => 'required'
        ]);

        $this->cryptService->setKey($params['key']);

        return response()->json([
            'message' => $this->cryptService->decryptText($params['text'])
        ], 200);
    }

    public function alphabet(Request $request)
    {
        $params = $this->toValidate($request, [
            'key' => 'required|numeric'
        ]);

        $this->cryptService->setKey($params['key']);

        return response()->json([
            'alphabet' => $this->cryptService->getEncryptedRelation()
        ], 200);
    }

    protected function toValidate(Request $request, array $validateArr)
    {
        return $this->validate($request, $validateArr);
    }
}
