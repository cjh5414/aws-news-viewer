1. 가상화
2. 클라우드 컴퓨팅을 위한 기술들
3. 클라우드 업체가 제공하는 대표적 서비스들
4. Azure에서 application을 hosting 하는 방식들
5. AWS의 AS와 ELB에 대하여
6. 기타 cloud computing에 대한 일반적 내용

### VPC


[vpc](vpc.png)

디지털 트랜스포메이션 – 자기의 서비스 개발, 문제 해결 등의 기반을 클라우드로 이동.



### 클라우드 컴퓨팅 스택

[cloud computing stack](cloud computing stack.png)

- OpenStack: 클라우드의 표준 스택. 소프트웨어의 계층.

-	인프라 : IaaS 공급자는 애플리케이션을 실행할 수 있는 서버 제공을 위해 가상 기술을 이용 / 가상 서버: 다양한 CPI, memory, network 등을 제공
-	플랫폼 : 고수준의 서비스를 생성하기 위해 사용되는 소프트웨어 계층 / Force.com, windows Azure, Google Apps/Google App Engine / 팀 협업, 테스트 도구, 프로그램 성능과 속성 측정 도구 / 버전 관리, 데이터베이스, 웹서비스 통합, 저장장치 툴을 위한 개발자 도구

## 가상화  
-	가상기구 : virtual machine image file consisting of a pre-configured OS environment and a single application /  가상 서버상에 설치된 소프트웨어, 클라우드 컴퓨팅 스택의 중간을 차지. / AMI(amazon machine images):사용자가 Xen 하이퍼바이저 서버에 설치할 수 있는 가상 기구의 모음.
Hypervisor 하이퍼바이저 (가상화 기술을 수행하게 하는 소프트웨어. Virtual machine manager)w
가상화란. 번역을 해주고 자원을 할당해준다. Os 처럼. 하이퍼 바이저가 그런 역할을 한다.
-	하나의 host computer(server) 에서 다수의 OS를 동시에 실행하기 위한 논리적 플랫폼. : 하나에 컴퓨터에 다수의 os를 실행할 수 있게 하는 플랫폼(소프트웨어)
-	가상화 기술이 발전했기 때문에 가능. 가상화의 결과물. 분산화 시스템으로부터 일부 자원을 만들어서 하나처럼 가짜로 만들어서 사용할 수 있게 됨.
-	역할 Native (bare-metal) 방식 : 하드웨어에 직접 하이퍼바이저가 설치되는 방식. (os 대신에) Xen, KVM 등
-	Hosted 방식 : 일반 애플리케이션처럼 프로그램으로 설치되어 실행. (os 위에) : vmware, virtual box 등.
-	전가상화(full virtualization) : 하드웨어 위에 오에스가 없이 하이퍼바이저가 설치되어서 번역(Translator)의 역할. 즉. OS에 맞게 번역하고 자원 할당을 같이 해준다.
-	반가상화(pare virtualization): 번역만 해주는. 역할이 조금 줄어듬.


## 클라우드 컴퓨팅을 위한 기술들
### 가상화
-	물리적 자원을 논리적으로 추상화하여 자원을 분리, 통할 할 수 있게 하는 SW 기술. 자원 절감, 효율성 개선. 하나의 물리적 서버 리소스에 여러 개의 서버 환경 할당, 각각의 환경에 OS와 application을 실행할 수 있게 함.
- 컨테이너: 어플리케이션의 실행 환경을 가상화 한 것. (Docker)
### 클러스터링
- 노드관리
-	많은 계산 또는 데이터 저장을 위해 여러 대의 컴퓨팅 자원을 하나로 묶어 놓은 시스템
-	하드웨어 자원들을 클러스터로 묶음
-	자원 관리, 부하 분산, 프로비저닝 등의 기능 제공. (프로비저닝 : 쓰지 않고 있는 자원을 파악하고 필요시 실기한으로 할당할 수 있도록 준비)
-	클러스터 관리 : 전 클러스터를 대상으로 한 자동 업데이트 기능 / 로드 밸런싱
### 분산 컴퓨팅
- 여러 서버에서 데이터가 분산되어 동시에 처리됨.
-	흩어진 자원을 활용할 수 있도록 데이터를 나누어 동시에 처리함
-	분산 데이터 관리(DDM: distributed data management) 대규모 데이터를 분산되어 있는 환경에 저장하는 시스템.
- 분산 병렬 처리
  - 분산 처리: 떨어져 있는 컴퓨터가 어떤 일을 나누어 처리하는 것
  - 병렬 처리: 중앙 처리 장치에서 동시에 일을 처리
- MapReduce(맵리듀스): 대규모의 데이터를 병렬적으로 처리하기 위한 기술 표준. Google에서 개발
- 분산파일시스템(DFS: distributed file system)
- Apache Hadoop. 한대의 master server 와 여러대의 slave server. 대용량 데이터 일괄처리
- Apache Spark 메모리 안에서 대량 데이터를 병렬 분산 처리
- NoSQL 대량의 데이터를 RDMS를 처리하기 힘든 단점을 보안. 빠르게 대량의 데이터를 처리할 수 있다.
### 서비스 지향 구조
- SOA(Service oriented architecture)
- 애플리케이션을 등록하고 사용하는데 브로커를 통해서.
- 빌려쓰는 시대. 소프트웨어, 하드웨어
- SaaS. multi-tenancy 소프트웨어가 SaaS 공급자의 서버에서 단일 인스턴스로 실행되면서 다중 테넌트들을 지원하는 형태(google docs)
- SaaS 가 발전되는 과정. 독립적인 인스턴스를 사용하는 단계 -> 하나의 인스턴스를 공유 -> 스케일러블하게 확장헤나가는 형(Multi-tenanacy)
### DevOps 개발과 운영의 통합
- 서비스 전체 그림 안에서 결정된 부분을 먼저 개발, 배포하는 스피드 중시형.

## AWS - AutoScaling
### What
- Application의 로드를 처리할 수 있는 정확한 수의 EC2 instance를 보유하도록 보장
- AS group: EC2 instance 모음
- 최대, 최소, 목표 instance 개수 지정
### 이점
- 내결함성 향상: 비정상적 instance를 탐지하여 정상적 instance로 대체
- 가용성 향상: 트래픽을 처리할 수 있는 적절한 용량 fault-tolerancy
- 비용 관리 개선 (돈이 절약 된다. 가변적 수요에 대처할 수 있기 때문)
- 가용 영역 저반에 instance 분산
  - region 내 여러 Availability Zone에 걸쳐 Auto scaling 그룹 확장 -> 지리적 이중화를 통한 보안 및 안정성 확보
  - Instance를 AZ간에 고르게 분산
  - VPC 내의 AS group: subnet에서 EC2 instance가 시작. 한 AZ에 여러 subnet이 있으면 subnet을 무작위로 선택하여 시작

## AWS - ELB Elastic load balacne
### What
- 트래픽을 여러개의 인스턴스로 **분산** 해서 서비스가 적절하게 유지되도록.
- AS와 결합되어 트래픽이 증가하면 AS가 인스턴스를 생성하고 그에 따라 트래픽을 분산.
- EC2 instance, container, IP address 같은 여러 대상에 대해 수신 application 또는 network traffic을 여러 AZ에 배포
### 기능
- Application Load Balancer
  - 들어오는 요청을 listener (요청을 어떻게 보낼 것인가의 규칙. 어떤 타겟으로 어떤 조건으로 어떤 우선순위로 보낼 것인가.)에 맞게 검사해서 target group으로 보냄.
  - 상태 모니터링
- 여러 개의 가용 영역 활성화: 각 AZ에 하나 이상의 대상 등록
- 교차 영억 로드 밸런싱 (Application load balancer에서는 항상 활성화.)
[교차영역로드 밸런싱 활성화](lb.png)
### 로드 밸런서 체계
- 내부 로드 밸런서
- 인터넷 경계 로드 밸런서
### 실습
- AS 그룹에 만든 elb를 대상그룹에 선택해주면 알아서 동작. -> AS에서 자동으로 만들어진 instance가 저절로 elb에 포함 된다.

## AWS - CloudWatch
- 과금 내역 확인
- AWS resource와 실시간으로 실행 중인 app을 모니터링
- 측정할 수 있는 지표를 수집/추적
- 알림, 경고, 통계
- 측정 결과 지표를 통해 AS 수행

## AWS - RDS(relational database service)
- 관계 데이터 베이스 ㅅ버의 구축/운용에 관한 서비스
- 쉬운 관리: 관리 콘솔, CLI, API 이용
- 자동백업, 스냅샷, 복제로 가용성 및 내구성
- 보안
- 쉬운 DB setup, 확장, 유지.

## Azure
마이크로 소프트에서 제공하는 클라우드 서비스. 오나전한 클라우드 컴퓨팅 플랫폼 -> PaaS 스타일의 서비스에 중점을 두었다.
- 기존 응용프로그램 호스트
- 새 응용 프로그램 개발 간소화
- on-premise 응용 프로그램 향상
- AI 및 기계 학습 서비스 제공 - 시각, 청각, 음성
- 저장소 솔루션

### 강조 사항
- Global
- Trusted
- Hybrid

### 아마존과의 차이
- 응용 프로그램 개발 환경을 많이 제공
- VPC를 만들어 준다.

### 호스팅 특징
- IaaS(customer-managed): VM 만들어서, 웹서버 구축, 디비서버 구축. 사용자가 직접 할 수 있다. -> Virtual Machines

- PaaS(platform-managed): App Service: 대부분의 웹 서비스, 웹 응용프로그램 호스팅. Service Fabric: 마이크로 서비스 아키텍처 서비스 개발 지원
  - DevOps.
  - 인프라를 관리할 필요 없이 선택한 프로그래밍 언어로 웹 응용 프로그램을 빌드하고 호스팅할 수 있음.
- serverless(code only): Azure functions
  - 코드 실행: HTTP 요청, Webhook, 클라우드 서비스 event 또는 일정에 따라 트리거 됨.

### Azure Functions (Serverless)
인프라 스트럭쳐 생각하는 시간을 줄인다. 서버를 생각하지 않고 개발한다. Provisioning, scaling, managemet of reources 가 잘 관리되는 서버를 이용한다.  
클라우드에서 작은 코드 또는 함수를 실행하기 위한 솔루션.

- 개발, 배포, 관리 도구 제공
- Visual Studio 또는 Azure CLI를 이용한 개발
- DevOps 도구를 이용한 지속적 개발
- Application Insights를 이용한 실시간 모니터링
- Event-driven compute-on-demand experience
- Run serverless solutions anywhere (on-premise, hybird environments like Azure Stack, Tot Edge devices)

#### 사용 예
- Web App backends
- Mobile App backends
- Real-time file processing
