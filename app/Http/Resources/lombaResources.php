<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class lombaResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                'id' => $this->id,
                'nama_lomba' => $this->nama_lomba,
                'UrlImage' => "http://127.0.0.1:8080/storage/" . $this->data_foto,
                'instansi_lomba' => new instansiLombaResources($this->instansiLomba),
                'persyaratan' => $this->persyaratan,
                'link_pendaftaran' => $this->link_pendaftaran,
                'tanggal_penutupan' => $this->tanggal_penutupan,
                'status' => new statusResources($this->status),
                'tingkatan' => new tingkatanResources($this->tingkatan),
                'account_admin' => new accountAdminResources($this->accountAdmin),
        ];
    }
}
