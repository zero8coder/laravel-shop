<?php

return [
    'alipay' => [
        'app_id'         => '2016101400681767',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkltAFKzFLQKWEoH3kV273AbG/OHxkaxLst+0bobm/VG5RrJj5pP7QIT89DpRoufV46UBO4eqqKDR2glE9iM5/i3dF5uvE0xrGSLkp2epFlHNs11EzbNltXmdv+XStqZRIZ+jTSyOQSSVPeG9qsvzCY817zYoqQO8NZDM+ZrS6pFK3oQZmXJSP5C48Ll2mGIAzu2X12mUAFlWGtdmNKkJFEMhmF7WBwfyuwHS7eA2oh+N/C8FGxKTKWBMelqvQVCMT91vVN1Fweb6ehuR6gnN1wM6nR9kXI0MGOniNBt4m7tHLRrDhETPxp575huiT0wuqibMrlCUpthyCyw6+OrteQIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEAk/IU8JhUpl7//fehMKj5MDthRiTOjQh9LcD0xhEiza6rg7eO/9iI+sUVbaSmFWoU07K+2ljBCPn5A/R7QbYkh74oTTNyO7XkhvyqjrgDdj/jsutGqMM/5pTsvJ0u6dVC8iPuSoOXw75KNL2Yep9JZiGMDnwB4youjEWGzBS9KCKiIFTTFxNoWMFrr0+IR3BB2kOcwjnBaUXV6rJ95Kg5NHwWYXyabhsl/tlOv3lzch35sGtPUsX9Vgcvs7J0ivkNra35VSMYxPe4sTSr4CdBfmAl/fN7o5kyb2YRb/kqJUDi9QffGhyAkaCM0K2kjS/3qfUsezWRca23a/wS4OHhrwIDAQABAoIBAETG/ssW1gt+EJ39d9cKRsYQZNlaFRflgWQ61tAZeUeLUzrpo7X28T87TgnpyDgeV85Ow4D4T80fgI9BIefbiEH+ufeh2hI+Lh4+6f9tNlbLvswXqoKcOmG0jBXnML8OIJA2+fl0EaKzHQZFudQPpuyu3dCB/9KecoNNcyv+3C0CqkWAOAu4WlOM+G5Kh/lwjn545/vFlifazap7EaOe36823fXufgztw7ukbV+JAPcmdh4qSi52fawOzxy8BYxmSkgbu4xWLs23TFTGxmgVvCbs4kWHg6DFs4QCqu1fQ4fdwppKlYkjSqTha0XTYocu9+IGYtKAkN0Mm4k9wdCnufkCgYEA+RlmK9EOsv9sAct3kLzW73SY5qLVhJLZTWaI6aon5BCWHZ26FLu4sW2HG7/hSnOUS8IFq7oa9E+SgbaNgeqoV4sV+v89UKoYp1qcBvPNO3E4UybVUtU1ztxdNRXmkZ7L+d44eDbPKxm9A6Jd5EUUBjgnQPYHYzZ5TPQu2nb9tTUCgYEAmAtOS3wYAA6D1nlIcw8Tw578TfnV+Zah3Bou+PGjfHjEhzbr0iO4MpiQDvxH1gsN0uWp0pxRS4j6COqfv5gXLpcrnLKQIANcNvSuPuAqstXmc0IM3ZwJmNlNr7nEem9Fip51h6SwFzZmIHMdRivY5hWZ4meIcikcMeL3EIPTS9MCgYEAn349xwxiZwXYOAX5Fnly/Xsgc3wLTolgDYj7XPGP/R0JoQjenmvbw+8nNQNU0wDSEPe3/c55d7iDS/6A+JAxHWx2tHE85ysiAfWoNWNhIxBJSiRxLkpJ25uJKnZNXSvZ2rEIYyBk4Wnndi4+A+ye96R4rcVZ0ZKNdFJctZC+vYkCgYAfqbsUXTNiT6OE9pzv2SP0iRdh5bV51LTAcXN2xFuXgE7tGbLigC3L25mkhUUwffzS/qDvCz6izFPFp5a8/59URIcAiu8Yu5pol2vyDBzYQVNMjWTAgc491oMnJTiVhrakt3siVFmXe+yotVBTXK4+vCDf1U/E9mq4uNtaxRkroQKBgQCkzOB6kgoDLlodG/5NmJQKR0ae30ZLCmHTnA2taDzgooZNVCjeqGA5g9ca/1CmMuHlwml8uyI+NF63LvWu0aPw4ifv7+9omMhboAfap3gC+XR2kT1sK6VSjurGoRX+JLLpw9tPSVP/EFksk/jHfSedAgrus3Kau+NLISqjBaPAIw==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_clinet' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ]
    ],


];
