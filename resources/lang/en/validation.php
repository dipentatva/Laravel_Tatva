<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'email' => 'The :attribute must be a valid email address.',
    'filled' => 'The :attribute field is required.',
    'exists' => 'The selected :attribute is invalid.',
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values is present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',
    'present'              => 'The :attribute field is required',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'uuid'                 => 'Please use valid UUID string for :attribute',
    'ip_whitelist_pattern' => 'The :attribute field is in invalid format. Example: (216.109.112.0-135, 216.109.112.0/24, 216.109.*.*)',
    'max_item'             => 'The record count may not be greater than :max_item.',
    'max_html_stripped'    => 'The :attribute may not be greater than :max characters.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'media_images.*.media_path' => [
            'valid_media_path' => 'Please enter valid media image',
        ],
        'documents.*.document_path' => [
            'valid_document_path' => 'Please enter valid document file',
        ],
        'media_videos.*.media_path' => [
            'valid_video_url' => 'Please enter valid youtube url',
        ],
        'avatar' => [
            'valid_profile_image' => 'Invalid image file or image type is not allowed. Allowed types: png, jpeg, jpg',
        ],
        'parent_skill' => [
            'valid_parent_skill' => 'Invalid parent skill',
        ],
        'url' => [
            'valid_media_path' => 'Please enter valid image url',
        ],
        'linked_in_url' => [
            'valid_linkedin_url' => 'Please enter valid linkedIn url',
        ],
        'documents.*' => [
            'valid_timesheet_document_type' => 'Please select valid timesheet documents',
            'max' => 'Document file size must be '.
            (config('constants.TIMESHEET_DOCUMENT_SIZE_LIMIT') / 1024).'mb or below',
        ],
        'date_volunteered' => [
            'before' => 'You cannot add time entry for future dates',
        ],
        'news_image' => [
            'valid_media_path' => 'Please enter valid media image',
        ],
        'user_thumbnail' => [
            'valid_media_path' => 'Please enter valid media image',
        ],
        'story_images.*' => [
            'valid_story_image_type' => 'Please select valid image type',
            'max' => 'Image size must be '.
            (config('constants.STORY_IMAGE_SIZE_LIMIT') / 1024).'mb or below',
        ],
        'story_videos' => [
            'valid_story_video_url' => 'Please enter valid video url',
            'max_video_url' => 'Maximum '.config('constants.STORY_MAX_VIDEO_LIMIT').' video url can be added',
        ],
        'story_images' => [
            'max' => 'Maximum '.config('constants.STORY_MAX_IMAGE_LIMIT').' images can be added',
        ],
        'impact.*.icon_path' => [
            'valid_icon_path' => 'Please enter a valid icon image.',
        ]
    ]
];
