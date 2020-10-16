<?php

namespace Blpraveen\MobileVerification\Concerns;

trait VerifyMobile
{
    /**
     * Determine if the user has verified their mobile number.
     */
    public function userPhoneVerified(): bool
    {
        return null !== $this->phone_verified_at);
    }

    /**
     * Mark the given user's mobile as verified.
     */
    public function phoneVerifiedAt(): bool
    {
          return $this->forceFill([
			 'phone_verified_at' => $this->freshTimestamp(),
		  ])->save();
    }

}