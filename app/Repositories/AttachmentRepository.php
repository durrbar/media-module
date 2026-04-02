<?php

declare(strict_types=1);

namespace Modules\Media\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\Media\Models\Attachment;

class AttachmentRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Attachment::class;
    }
}
