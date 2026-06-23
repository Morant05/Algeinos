<?php

it('has repartidores page', function () {
    $response = $this->get('/repartidores');

    $response->assertStatus(200);
});
