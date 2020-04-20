<?php

Meta::addCss('admin-custom-js', mix('css/admin.css'), ['admin-default']);
Meta::addJs('admin-custom-js', mix('js/admin.js'), ['admin-default']);
Meta::addJs('admin-custom-js-0', asset('packages/sleepingowl/ckeditor/ckeditor.js'), ['admin-default']);
Meta::addJs('admin-custom-js-4', asset('js/manifest.js'), ['admin-default']);
