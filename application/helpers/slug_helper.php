<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('create_slug_from_bengali')) {
    function create_slug_from_bengali($title) {
        // বাংলা অক্ষরগুলোকে ইংরেজিতে রূপান্তর করার ম্যাপিং অ্যারে
        $bengali = array(
            'অ', 'আ', 'ই', 'ঈ', 'উ', 'ঊ', 'ঋ', 'এ', 'ঐ', 'ও', 'ঔ',
            'ক', 'খ', 'গ', 'ঘ', 'ঙ', 'চ', 'ছ', 'জ', 'ঝ', 'ঞ',
            'ট', 'ঠ', 'ড', 'ঢ', 'ণ', 'ত', 'থ', 'দ', 'ধ', 'ন',
            'প', 'ফ', 'ব', 'ভ', 'ম', 'য', 'র', 'ল', 'শ', 'ষ',
            'স', 'হ', 'ড়', 'ঢ়', 'য়', 'ৎ', 'ং', 'ঃ', 'ঁ',
            'া', 'ি', 'ী', 'ু', 'ূ', 'ৃ', 'ে', 'ৈ', 'ো', 'ৌ', '্',
            '০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', ' '
        );

        $english = array(
            'a', 'a', 'i', 'i', 'u', 'u', 'ri', 'e', 'oi', 'o', 'ou',
            'k', 'kh', 'g', 'gh', 'ng', 'ch', 'chh', 'j', 'jh', 'n',
            't', 'th', 'd', 'dh', 'n', 't', 'th', 'd', 'dh', 'n',
            'p', 'f', 'b', 'bh', 'm', 'y', 'r', 'l', 'sh', 'sh',
            's', 'h', 'r', 'rh', 'y', 't', 'ng', 'h', 'n',
            'a', 'i', 'i', 'u', 'u', 'ri', 'e', 'oi', 'o', 'ou', '',
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-'
        );

        // বাংলা টাইটেলকে ইংরেজিতে কনভার্ট করা
        $slug = str_replace($bengali, $english, $title);
        
        // অপ্রয়োজনীয় ক্যারেক্টার বাদ দেওয়া এবং ছোট হাতের অক্ষরে রূপান্তর করা
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug); 
        $slug = strtolower(trim($slug, '-'));

        // যদি কোনো কারণে স্লাগ খালি হয়ে যায়
        if (empty($slug)) {
            $slug = 'form-' . time();
        }

        return $slug;
    }
}