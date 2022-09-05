<?php
    it('has about page', function () {
        $this->get('/about')->assertStatus(200);
    })->group('PublicViews');
