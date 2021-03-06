<?php
namespace App\Rules;

use Illuminate\Support\Facades\Validator;
use App\Helpers\IPValidationHelper;
use App\Models\Skill;
use DB;

class CustomValidationRules
{
    public static function validate()
    {
        Validator::extend('valid_media_path', function ($attribute, $value) {
            try {
                $urlMimeType = isset(get_headers($value, 1)['Content-Type']) ? get_headers($value, 1)['Content-Type'] :
                get_headers($value, 1)['content-type'];
                $validMimeTypes = config('constants.slider_image_mime_types');
                return (!in_array($urlMimeType, $validMimeTypes)) ? false : true;
            } catch (\Exception $e) {
                return false;
            }
        });

        Validator::extend('valid_document_path', function ($attribute, $value) {
            try {
                $urlMimeType = isset(get_headers($value, 1)['Content-Type']) ? get_headers($value, 1)['Content-Type'] :
                get_headers($value, 1)['content-type'];
                $validMimeTypes = config('constants.document_mime_types');
                return (!in_array($urlMimeType, $validMimeTypes)) ? false : true;
            } catch (\Exception $e) {
                return false;
            }
        });

        Validator::extend('valid_video_url', function ($attribute, $value) {
            return (preg_match(
                '~^(?:https?://)?(?:www[.])?(?:youtube[.]com/watch[?]v=|youtu[.]be/)([^&]{11}) ~x',
                $value
            ))
            ? true : false;
        });

        Validator::extend('valid_profile_image', function ($attribute, $value, $params, $validator) {
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $value));
            $f = finfo_open();
            $result = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
            return in_array($result, config('constants.profile_image_types'));
        });


        Validator::extend('ip_whitelist_pattern', function ($attribute, $value) {
            $ipHelper = new IPValidationHelper();
            // Check for valid range pattern
            if ($ipHelper->validRangePattern($value)) {
                return true;
            }
            // Check for valid wildcard pattern
            if ($ipHelper->validWildcardPattern($value)) {
                return true;
            }
            // Check for valid cidr pattern
            if ($ipHelper->validCidrPattern($value)) {
                return true;
            }
            // Check for valid valid ip
            if ($ipHelper->validIp($value)) {
                return true;
            }
            return false;
        });

        Validator::extend('max_item', function ($attribute, $value, $params) {
            $itemCount = DB::table($params[0])
                ->whereNull('deleted_at')
                ->count();

            return $itemCount + 1 <= $params[1];
        });

        Validator::replacer('max_item', function($message, $attribute, $rule, $parameters) {
            return str_replace(':max_item', $parameters[1], $message);
        });

        Validator::extend('max_html_stripped', function($attribute, $value, $params) {
            return strlen(strip_tags($value)) <= $params[0];
        });
        Validator::replacer('max_html_stripped',
            function($message, $attribute, $rule, $params) {
                return str_replace(':max', $params[0], $message);
            }
        );
    }
}
