<?php 

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

/**
 * summary
 */
class CacheMessages implements MessagesInterface
{
	protected $messages;
    /**
     * summary
     */
    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function getPaginated()
    {
    	$key = "message.key.". request('page', 1);

        return Cache::tags('messages')->rememberForever($key, function() {
            return $this->messages->getPaginated();
        });
    }

    public function store($request)
    {
    	$message = $this->messages->store($request);

        Cache::tags('messages')->flush();

        return $message;
    }

    public function findById($id)
    {
    	return Cache::tags('messages')->rememberForever("messages.{$id}", function() use ($id) {
            return $this->messages->findById($id);
        });
    }

    public function update($request, $id)
    {
    	$message = $this->message->update($request, $id);
        Cache::tags('messages')->flush();
    	return $message;
    }

    public function destroy($id)
    {
        $message = $this->message->destroy($id);
        Cache::tags('messages')->flush();
    	return $message;
    }
}