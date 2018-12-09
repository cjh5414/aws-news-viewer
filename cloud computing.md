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
