<div>
  <table>
    <tbody>
      <tr>
        @foreach ($thead as $item)
          <th>
            {{ $item }}
          </th>
        @endforeach
      </tr>
      @foreach ($tbody_data as $item)
        <tr>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
