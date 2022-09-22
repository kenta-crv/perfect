
@php
    $array = [
      '年月日',
      '対象年月',
      'プラン',
      'アカウント',
      '請求金額',
      '決済NG',
      '入金',
      '未払い残',
      '備考',
    ]
@endphp
<x-admin.table>
  <x-slot name="thead">
    <x-admin.table.cell :thead="$array"/>
  </x-slot>
  <x-slot name="tbody">
    <x-admin.table.heading>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
        21,450円
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right">9,650</x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_first_row c_history_align_right"></x-admin.table.row>
    </x-admin.table.heading>
    <x-admin.table.heading>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        2022年07月01日
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        ベーシック
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        15
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        9,650
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        21,450円
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        NG
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        0
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
        9,650
      </x-admin.table.row>
      <x-admin.table.row
        class-type="td_c_history c_history_align_right">
      </x-admin.table.row>
    </x-admin.table.heading>
  </x-slot>
</x-admin.table>
