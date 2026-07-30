<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Validasi manual jika baris kosong (pengganti interface tadi)
        if (!isset($row['email']) || empty($row['email'])) {
            return null;
        }

        // Cek duplikat email
        if (User::where('email', $row['email'])->exists()) {
            return null;
        }

        $data = [
            'name'     => $row['nama'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
            'role'     => strtolower($row['role']),
        ];

        if (strtolower($row['role']) === 'guru' && !empty($row['nip'])) {
            // Cek duplikat NIP
            if (User::where('nip', $row['nip'])->exists()) {
                return null;
            }
            $data['nip'] = $row['nip'];
        }

        return new User($data);
    }
}