<?php

namespace Blpraveen\MobileVerification\Contracts;

interface MustVerifyMobile
{
    /**
     * Determine if the user has verified their mobile number.
     *
     * @return bool
     */
    public function userPhoneVerified(): bool;

    /**
     * Mark the given user's mobile as verified.
     *
     * @return bool
     */
    public function phoneVerifiedAt(): bool;

    /**
     * Get the mobile number that should be used for verification.
     *
     * @return string
     */
    public function getMobileForVerification(): string;
}