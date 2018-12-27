<?php

namespace Spatie\Searchable\Tests\stubs;

use Illuminate\Support\Collection;
use Spatie\Searchable\SearchAspect;

class CustomNameSearchAspect extends SearchAspect
{
    protected $accounts = [];

    public function __construct()
    {
        $this->accounts = [
            new Account('john doe'),
            new Account('jane doe'),
            new Account('abc'),
        ];
    }

    public function getResults(string $term): Collection
    {
        return collect($this->accounts)
            ->filter(function (Account $account) use ($term) {
                return str_contains($account->name, $term);
            });
    }
}
