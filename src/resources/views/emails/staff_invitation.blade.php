@component('mail::message')
# ショップスタッフ招待

以下のリンクから登録を完了してください。

@component('mail::button', ['url' => $invitationLink])
招待リンク
@endcomponent

@endcomponent
