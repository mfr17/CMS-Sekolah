<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->text('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });

        Setting::create([
            'key' => '_site_name',
            'label' => 'Judul Situs',
            'value' => 'CMS Sekolah',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_location',
            'label' => 'Alamat',
            'value' => 'Im Here',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_maps_link',
            'label' => 'Google Maps Link',
            'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31626.07164287376!2d110.37376381298158!3d-7.762338481864093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5991519f2401%3A0x4027a76e352fec0!2sDepok%2C%20Kec.%20Depok%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1717793918076!5m2!1sid!2sid" width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_site_icon',
            'label' => 'Site Icon',
            'value' => '',
            'type' => 'image',
        ]);
        Setting::create([
            'key' => '_site_logo',
            'label' => 'Site Logo',
            'value' => '',
            'type' => 'image',
        ]);
        Setting::create([
            'key' => '_npsn',
            'label' => 'NPSN',
            'value' => '08453',
            'type' => 'int',
        ]);
        Setting::create([
            'key' => '_youtube',
            'label' => 'Youtube',
            'value' => 'https://youtube.com',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_instagram',
            'label' => 'Instagram',
            'value' => 'https://instagram.com',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_facebook',
            'label' => 'Facebook',
            'value' => 'https://facebook.com',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_phone',
            'label' => 'Phone',
            'value' => '02100000',
            'type' => 'int',
        ]);
        Setting::create([
            'key' => '_whatsapp',
            'label' => 'Whatsapp',
            'value' => '62812345678',
            'type' => 'int',
        ]);
        Setting::create([
            'key' => '_email',
            'label' => 'Email',
            'value' => 'example@example.com',
            'type' => 'text',
        ]);
        Setting::create([
            'key' => '_site_description',
            'label' => 'Site Description',
            'value' => 'Lorem ipsum dolor',
            'type' => 'longtext',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
