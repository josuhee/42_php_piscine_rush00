# 42_php_piscine_rush00

## Projects
- omdb api를 사용한 moviemon을 만들어 게임 만들기.  
- php symfony 사용.
<br/>

> ### World Map
> - 게임이 시작되면 플레이어가 world map 페이지로 이동
> - 페이지는 최소 5x5의 정사각형 테이블에 있으며 플레이어는 그 가운데에서 시작됨.
> - link를 사용하여 상하좌우로 이동
> - 플레이어는 이동할 때마다 랜덤으로 moviemon과 싸울 수 있음.
<br/>

> ### Battle
> - 전투는 턴제로 진행
> - 각 전투에서는 moviemon의 해당 영화 포스터와 체력과 공격력이 표시 (이때, 수치는 랜덤)
> - 플레이어는 moviemon을 잡을 때 마다 공격력이 증가.
> - 해당 페이지에서 플레이어는 언제든 세계지도로 돌아올 수 있음(cancel).

<br/>

## Win
> 1. moviemon의 체력(health)이 0이 되는 경우, capture
> 2. 그리고 world map으로 복귀
> 3. 복귀하는 경우 플레이어의 체력 회복.

![win](https://user-images.githubusercontent.com/69746967/122404952-9b38f500-cfba-11eb-8318-c175a4556354.gif)
<br/>

## Movie Dex
> - capture한 모든 moviemon을 표시
> - 잡은 moviemon일 경우 해당 영화에 대한 세부정보 표시

![movie](https://user-images.githubusercontent.com/69746967/122405001-a2f89980-cfba-11eb-9deb-344a10ffbb12.gif)
<br/>

## Save and Load
> - 기존 저장된 파일에서 게임을 로드함.
> - 플레이어의 정보는 json 형태로 저장할 것.

![saveload](https://user-images.githubusercontent.com/69746967/122404976-9ecc7c00-cfba-11eb-9bf2-edc9c15c3e14.gif)
<br/>

## Game Over
> 1. 체력이 0에 도달한 경우.
> 2. 게임 오버 메시지 출력
> 3. 게임 리셋

![gameover](https://user-images.githubusercontent.com/69746967/122404754-717fce00-cfba-11eb-890c-b95c7296a74e.gif)
