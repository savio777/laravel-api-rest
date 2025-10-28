<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        // todo: implement cache
        $totalUsers = User::count();

        return [
            'data' => $this->collection,
            'total_items' => $totalUsers,
            'list_length' => count($this->collection),
            'current_page' => (int) $request->query('current_page', 1),
            'items_per_page' => (int) $request->query('items_per_page', 10),
            'total_items' => $totalUsers,
            'total_pages' => ceil($totalUsers / $request->query('items_per_page', 10)),
        ];
    }
}
