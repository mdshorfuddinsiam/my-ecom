<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('title');
            $table->string('thumbnail_image');
            $table->string('slug');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('subsubcategory_id')->nullable();
            $table->double('selling_price',15,2)->unsigned();
            $table->double('discount_price',15,2)->unsigned()->nullable();
            $table->date('start_discount_date')->nullable();
            $table->date('end_discount_date')->nullable();
            $table->string('unit');
            $table->string('sku');
            $table->text('short_description');
            $table->longText('long_description');
            $table->text('video_link')->nullable();
            $table->boolean('is_new')->nullable();
            $table->boolean('is_top')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->boolean('is_best')->nullable();
            $table->boolean('is_today_deals')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
