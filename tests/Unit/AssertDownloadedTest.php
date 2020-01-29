<?php

namespace Tests\Unit;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class AssertDownloadedTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        Excel::fake();

        $user = factory('App\User')->create();
        $this->actingAs($user)->get('/download');

        Excel::assertDownloaded('products.xlsx', function(ProductsExport $export) {
            return $export->collection()->contains('rubric', '=>', 'Электроинструменты');
        });
    }
}
