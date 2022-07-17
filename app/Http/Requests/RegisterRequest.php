 <?php

    namespace App\Http\Requests\V1\Clinic;

    use App\Enums\ClinicSubscriptionTypeEnum;
    use Avidianity\LaravelExtras\Rules\PictureRule;
    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;

    class RegisterRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules()
        {
            return [
                'name' => ['required', 'string', 'max:255'],
                'sex' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'department' => ['required', 'string', 'max:255'],
                'degree' => ['required', 'string', 'max:255'],
                'course' => ['required', 'string', 'max:255'],
                'major' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
            ];
        }
    }
