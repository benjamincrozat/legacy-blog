<?php

it('shows the announcement, the CTA and the image', function () {
    $view = $this->assertView('components.announcement', $attributes = [
        'link' => fake()->url(),
        'slot' => 'This is the announcement.',
        'cta' => 'Click here',
    ]);

    $view
        ->hasLink($attributes['link'])
        ->hasAttribute('target', '_blank');

    $view->contains($attributes['slot']);

    $view->contains($attributes['cta']);

    $view
        ->first('img')
        ->hasAttribute('src', 'https://www.gravatar.com/avatar/' . md5('benjamincrozat@me.com') . '?s=128');
});
