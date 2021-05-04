<?php

namespace Sparav\IdentityProtection;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Sparav\IdentityProtection\Models\EmailIdentityProtection;

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

    /**
     * Returns breached mails for a user.
     * @param EmailIdentityProtection $emailIdentityProtection
     * @return Response
     */
    public function patch(EmailIdentityProtection $emailIdentityProtection) {
        $response = Http::timeout(15)
            ->patch("https://sparavidentityprotectionapiprod.azurewebsites.net/api/v1/updateemailidentity", (array) $emailIdentityProtection);
        return $response;
    }

    /**
     * Deletes an identity by the given ID.
     * @param int $identity_id
     * @return Response
     */
    public function deleteIdentity(int $identity_id) {
        $response = Http::timeout(15)
            ->delete("https://sparavidentityprotectionapiprod.azurewebsites.net/api/v1/email/delete/{$identity_id}");
        return $response;
    }

    /**
     * Sets breached email status to 0, meaning user has dismissed it
     * @param int $breach_id
     * @return Response
     */
    public function deleteBreachedEmail(int $breach_id) {
        $response = Http::timeout(15)
            ->post("https://sparavidentityprotectionapiprod.azurewebsites.net/api/v1/user/email/dismiss/{$breach_id}");
        return $response;
    }

    /**
     * Returns breached mails with details for a user.
     * @param string $email
     * @return Response
     */
    public function breachedEmailsDetails(string $email) {
        $response = Http::timeout(15)
            ->get("https://sparavidentityprotectionapiprod.azurewebsites.net/api/v1/emaildetails/{$email}");
        return $response;
    }
}
