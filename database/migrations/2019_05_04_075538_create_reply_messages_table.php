<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_id')->unsigned();
            $table->mediumText('reply_text');
            $table->timestamps();

            $table->foreign('message_id')
                ->references('id')
                ->on('messages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reply_messages',function (Blueprint $table)
        {
            $table->dropForeign('reply_messages_message_id_foreign');
        });

        Schema::dropIfExists('reply_messages');
    }
}
