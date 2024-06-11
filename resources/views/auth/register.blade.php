<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" id="registrationForm">
            @csrf

            <!-- Step 1 -->
            <div id="step-1" class="step active">
                <h2>Step 1: Basic Information</h2>

                <div class="mb-4">
                    <x-label for="role" value="{{ __('Role') }}" />
                    <select id="role" class="block mt-1 w-full" name="role" required>
                        <option value="">Select Role</option>
                        <option value="Customer">Customer</option>
                        <option value="PropertyOwner">Property Owner</option>
                    </select>
                </div>

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex justify-right pt-2">
                    <button class="p-2 bg-gray-400 rounded-lg" type="button" onclick="showStep(2)">Next</button>
                </div>
                
            </div>

            <!-- Step 2 -->
            <div id="step-2" class="step">
                <h2>Step 2: Additional Details</h2>

                <div class="mt-4">
                    <x-label for="nic_number" value="{{ __('NIC Number') }}" />
                    <x-input id="nic_number" class="block mt-1 w-full" type="text" name="nic_number"
                        :value="old('nic_number')" placeholder="NIC Number" />
                </div>

                <div class="mt-4">
                    <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                    <x-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
                        :value="old('phone_number')" placeholder="Phone Number" />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Address') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                        placeholder="Address" />
                </div>

                <div class="mt-4">
                    <x-label for="city" value="{{ __('City') }}" />
                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                        placeholder="City" />
                </div>

                <div class="mt-4">
                    <x-label for="country" value="{{ __('Country') }}" />
                    <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')"
                        placeholder="Country" />
                </div>

                <div class="mt-4">
                    <x-label for="zip_code" value="{{ __('Zip Code') }}" />
                    <x-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')"
                        placeholder="Zip Code" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex justify-between pt-2">
                    <button class="px-2 bg-gray-400 rounded-lg" type="button" onclick="showStep(1)">Back</button>
                    <x-button class="ms-4" type="submit">{{ __('Register') }}</x-button>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const steps = document.querySelectorAll('.step');
        steps.forEach((step, i) => {
            step.style.display = i === 0 ? 'block' : 'none';
        });

        function showStep(stepNumber) {
            steps.forEach((step, i) => {
                step.style.display = i + 1 === stepNumber ? 'block' : 'none';
            });
        }
        window.showStep = showStep; 
    });
</script>
