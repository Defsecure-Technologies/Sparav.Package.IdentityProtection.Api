<?php

namespace Sparav\IdentityProtection\Models;


class EmailIdentityProtection
{

    /**
     * @OA\Property(type="integer")
     */
    public int $id;

    /**
     * @OA\Property(type="integer")
     */
    public int $user_id;

    /**
     * @OA\Property(type="string")
     */
    public string $email;

    /**
     * @OA\Property(type="integer")
     */
    public int $pwned;

    /**
     * @OA\Property(type="string", format="date-time")
     */
    public string $updated_at;

    /**
     * @OA\Property(type="string", format="date-time")
     */
    public string $created_at;

}
