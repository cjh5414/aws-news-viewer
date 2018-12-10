1. 가상화
2. 클라우드 컴퓨팅을 위한 기술들
3. 클라우드 업체가 제공하는 대표적 서비스들
4. Azure에서 application을 hosting 하는 방식들
5. AWS의 AS와 ELB에 대하여
6. 기타 cloud computing에 대한 일반적 내용



1. 클라우드 컴퓨팅을 위한 기술들을 나열하고 설명하시오.
### 가상화
물리적인 자원을 놀리적으로 추상화하여 자원을 분리, 통합할 수 있게 하는 소프트웨어 기술.
- 컨테이너: 어플리케이션의 실행 환경을 가상화한 것. Docker.

### 클러스터링
많은 계산 또는 데이터 저장을 위해 여러 대의 컴퓨팅 자원을 하나로 묶어놓은 시스템. 자원 관리, 부하 분산, 프로비저닝 등의 기능을 제공한다.
- 로드 밸런싱.
- 자동 확장성.
- 자동 업데이트 기능.

### 분산 컴퓨팅 기술
여러 서버에서 데이터가 분산되어 동시에 처리 됨.
- 분산 데이터 관리
- 분산 병렬 처리
- 맵 맵리듀스 : 대규모의 데이터를 병렬적으로 처리하기 위한 기술 표준. google에서 개발
- 분산 파일 시스템 : dropbox, onedrive, google drive 등

### 서비스 지향 구조 SOA
소프트웨어든 하드웨어든 빌려쓰느 ㄴ시대. 어플리케이션을 등록하고 사용하는데 브로커를 통해서 함.
SaaS 플랫폼.

### DevOps
개발과 운영의 통합. 서비스 전체 그림 안에서 결정된 부분을 먼저 개발, 배포하는 스피드 중시형.

### 보안


2. 클라우드 가상화에 대해 서술하시오.
하나의 host computer(server) 에서 다수의 os를 동시에 실행하기 위한 논리적 플랫폼. 하이퍼바이저.
- 가상기구: 가상 서버상에 설치된 소프트웨어 like image.
- Native 방식(bare-metal): 하드웨어에 직접 하이퍼바이저가 설치되는 방식. Xen, KVM 등.
- hosted 방식: 일반 애플리케이션처럼 프로그램으로 설치되는 방식. Vmware, Virtual box 등.
- 전가상화: 하드웨어 위에 오에스가 없이 하이퍼바이저가 설치되어서 번역의 역할을 한다. 즉 os에 맞게번역하고 자원 할당을 같이 해준다.
- 반가상화: 역할이 조금 줄어들어 번역만 해준다.


3. 클라우드 업체가 제공하는 대표적인 서비스들을 나열하시오.
### Amazon AWS
대부분의 분야의 클라우드 서비스를 지원. 비교적 IaaS 서비스가 잘 되어있다.

### Microsoft Azure
PaaS 스타일의 서비스에 중점을 두었다.
- on-premise 응용 프로그램 향상.
- AI 및 기계 학습 서비스 제공 - 시각, 청각, 음성

### IBM Softlayer
- Iaas 서비스. Bare metal Server
- Paas

### Google cloud Platform
- IaaS/PaaS 서비스.
- computing, storage, network, big data, service, management

4. Azure의 Application을 호스트하는 방식을 나열하고 설명하시오.
### Iaas (Customer-managed)
VM을 만들어서 사용자가 직접 웹 서버, 디비 서버 등을 구축한다.
- Azure virtual machine

### PaaS (Platform-managed)
DevOps를 기반으로 대부분의 웹 서비스, 웹 응용프로그램을 호스팅한다. 인프라를 관리할 필요 없이 선택한 프로그래밍 언어로 웹 응용 프로그램을 빌드하고 호스팅할 수 있다.
- Service Fabric: 마이크로 서비스 아키텍처 서비스 개발을 지원한다.

### Azure functions. Serverless (Code only)
서버를 구축하지 않고 프로그램을 빌드, 관리하지 않고 클라우드에서 작은 코드 혹은 함수만 작성하면 웹 서비스를 할 수 있다.


5. AWS의 AS와 ELB이 각각 무엇인지 서술하고 이로 인해 얻을 수 있는 장점이 무엇인지 서술하시오.
### Auto Scaling
최소, 최대, 목표 instance 개수를 설정하고 AS group를 지정하여 필요한 만큼만의 instance를 생성하여 사용한다. AWS에서 알아서 instance의 개수를 조절한다.
#### 이점
- 필요한 만큼만 쓸 수 있어서 비용 관리.
- 가변적 수요에 대처.
- region 내의 여러 AZ에 걸쳐 사용함으로써 지리적 이중화를 통한 안정성 확보
- 비정상적 instance를 탐지하여 정상적 instance로 대체/

### Elastic Load Balancer
트래픽을 여러개의 instance로 분산해서 서브시가 적절하게 유지되도록 한다. 들어오는 요청을 어떤 타겟으로 보낼 것인지를 결정하는 listener에 맞게 검사해서 target group로 보낸다.
AS 그룹에 생성한 ELB를 대상그룹으로 설정해주면 알아서 동작한다.  
