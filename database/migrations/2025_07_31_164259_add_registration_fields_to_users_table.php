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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'full_name')) {
                $table->string('full_name')->after('name');
            }
            if (!Schema::hasColumn('users', 'birth_date')) {
                $table->date('birth_date')->nullable()->after('full_name');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('birth_date');
            }
            if (!Schema::hasColumn('users', 'whatsapp_number')) {
                $table->string('whatsapp_number')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable()->after('whatsapp_number');
            }
            if (!Schema::hasColumn('users', 'education_level')) {
                $table->enum('education_level', ['D3', 'D4', 'S1', 'S2', 'S3'])->nullable()->after('gender');
            }
            if (!Schema::hasColumn('users', 'university_name')) {
                $table->string('university_name')->nullable()->after('education_level');
            }
            if (!Schema::hasColumn('users', 'nim')) {
                $table->string('nim')->unique()->nullable()->after('university_name');
            }
            if (!Schema::hasColumn('users', 'student_id_card')) {
                $table->string('student_id_card')->nullable()->after('nim');
            }
            if (!Schema::hasColumn('users', 'organization_origin')) {
                $table->string('organization_origin')->nullable()->after('student_id_card');
            }
            if (!Schema::hasColumn('users', 'is_verified')) {
                $table->boolean('is_verified')->default(false)->after('organization_origin');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'full_name', 'birth_date', 'address', 'whatsapp_number', 'gender',
                'education_level', 'university_name', 'nim', 'student_id_card',
                'organization_origin', 'is_verified'
            ];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
