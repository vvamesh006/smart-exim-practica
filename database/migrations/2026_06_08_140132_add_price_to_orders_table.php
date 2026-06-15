<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Coloana proposed_price exista deja - nimic de facut
        if (!Schema::hasColumn('orders', 'proposed_price')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->decimal('proposed_price', 10, 2)->nullable()->after('notes');
            });
        }
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('proposed_price');
        });
    }
};
