<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class beasiswaResources extends JsonResource
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
            'nama_beasiswa' => $this->nama_beasiswa,
            'UrlImage' => "http://127.0.0.1:8080/storage/" . $this->data_foto,
            'instansi_beasiswa' => new instansiBeasiswaResources($this->instansiBeasiswa),
            'persyaratan' => $this->persyaratan,
            'link_pendaftaran' => $this->link_pendaftaran,
            'tanggal_penutupan' => $this->tanggal_penutupan,
            'status' => new statusResources($this->status),
            'tingkatan' => new tingkatanResources($this->tingkatan),
            'account_admin' => new accountAdminResources($this->accountAdmin),
        ];
    }
}
