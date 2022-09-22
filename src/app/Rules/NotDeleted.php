<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;

class NotDeleted implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table_name, $attribute)
    {
        $this->table_name  = $table_name;
        $this->attribute  = $attribute;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !DB::table($this->table_name)->whereNotNull('deleted_at')->pluck($this->attribute)->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'この:attributeは一度使われています。別の:attributeを指定してください。';
    }
}
