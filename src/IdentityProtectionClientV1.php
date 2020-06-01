<?php

namespace Sparav\IdentityProtection;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class IdentityProtectionClientV1
{

    /**
     * @param string $email
     * @param int $user_id
     * @return Response
     */
    public function addIdentity(string $email, int $user_id)
    {
        $response = Http::timeout(15)
            ->post('http://sparavidentityprotectionapiprod.azurewebsites.net/api/v1/email', [
                'email' => $email,
                'user_id' => $user_id,
            ]);
        return $response;
    }

    /**
     * Returns breached mails for a user.
     * @param int $user_id
     * @return Response
     */
    public function breachedEmails(int $user_id) {
        $response = Http::timeout(15)
            ->get("https://sparavidentityprotectionapiprod.azurewebsites.net/api/v1/user/email/{$user_id}");
        return $response;
    }

}
